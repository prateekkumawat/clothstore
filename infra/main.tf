terraform {
  required_providers {
    aws = {
      source = "hashicorp/aws"
      version = "5.13.1"
    }
  }
}

provider "aws" {
 access_key = var.aws_access_key
 secret_key = var.aws_secret_key
 region = var.regions
}

# Define key gor aws key pem 
resource "tls_private_key" "demo_key" {
  algorithm = "RSA"
  rsa_bits  = 4096 
}

# aws key pair define 
resource "aws_key_pair" "demo_key_pair" {
  key_name   =  var.user_key_name
  public_key = tls_private_key.demo_key.public_key_openssh
}

resource "local_file" "mykey" {
   filename = "$(var.user_key_name).pem"
   content = tls_private_key.demo_key.private_key_pem
}

output "private_key" {
 value = tls_private_key.demo_key.private_key_pem
 sensitive = true 
}

#Create a Custom Vpc Resoures 

resource "aws_vpc" "vpc1" { 
    cidr_block = var.vpc_cidr
    instance_tenancy = "default"

tags = local.tags_common
}

resource "aws_vpc" "vpc2" { 
    cidr_block = var.vpc2_cidr
    instance_tenancy = "default"

tags = local.tags_common2
}

resource "aws_subnet" "Public_prod" { 
    cidr_block = var.subnet1_vpc2_cidr
    vpc_id = aws_vpc.vpc2.id
    availability_zone = "ap-south-1a"
    map_public_ip_on_launch = "true"

    tags = local.tags_common2
}
resource "aws_subnet" "Public" { 
    cidr_block = var.subnet1_cidr
    vpc_id = aws_vpc.vpc1.id
    availability_zone = "ap-south-1a"
    map_public_ip_on_launch = "true"

    tags = local.tags_common
}

resource "aws_subnet" "Public2" { 
    cidr_block = var.subnet4_cidr
    vpc_id = aws_vpc.vpc1.id
    availability_zone = "ap-south-1b"
    map_public_ip_on_launch = "true"

    tags = local.tags_common
}
resource "aws_subnet" "Private" { 
    cidr_block = var.subnet2_cidr
    availability_zone = "ap-south-1a"
    vpc_id = aws_vpc.vpc1.id

    tags = local.tags_common
}

resource "aws_subnet" "Private2" { 
    cidr_block = var.subnet3_cidr
    vpc_id = aws_vpc.vpc1.id
    availability_zone = "ap-south-1b"
    tags = local.tags_common
}

resource "aws_internet_gateway" "vpc1igw" {
  vpc_id = aws_vpc.vpc1.id

  tags = local.tags_common
}

resource "aws_internet_gateway" "vpc2igw" {
  vpc_id = aws_vpc.vpc2.id

  tags = local.tags_common2
}
resource "aws_route_table" "PublicRT" {
  vpc_id = aws_vpc.vpc1.id

  route  {
    cidr_block = "0.0.0.0/0"
    gateway_id = aws_internet_gateway.vpc1igw.id
  }
  
  tags = local.tags_common
}

resource "aws_route_table" "PublicRT2" {
  vpc_id = aws_vpc.vpc2.id

  route  {
    cidr_block = "0.0.0.0/0"
    gateway_id = aws_internet_gateway.vpc2igw.id
  }
  
  tags = local.tags_common2
}

resource "aws_route_table_association" "assosiatepublicsubnetprod" {
  subnet_id      = aws_subnet.Public_prod.id
  route_table_id = aws_route_table.PublicRT2.id
}

resource "aws_route_table_association" "assosiatepublicsubnet" {
  subnet_id      = aws_subnet.Public.id
  route_table_id = aws_route_table.PublicRT.id
}

resource "aws_route_table_association" "assosiatepublicsubnet2" {
  subnet_id      = aws_subnet.Public2.id
  route_table_id = aws_route_table.PublicRT.id
}

resource "aws_instance" "myins" {  
  ami                    =  var.imageid
  instance_type          =  var.instance_flavour
  key_name               = aws_key_pair.demo_key_pair.key_name
  subnet_id              = aws_subnet.Public.id
  associate_public_ip_address = "true"
  vpc_security_group_ids   = [aws_security_group.vpc1_sec.id]
  tags = local.tags_common
  lifecycle {
    create_before_destroy = true
  }
}


resource "aws_instance" "myins_prod" {  
  ami                    =  var.imageid
  instance_type          =  var.instance_flavour
  key_name               = aws_key_pair.demo_key_pair.key_name
  subnet_id              = aws_subnet.Public.id
  associate_public_ip_address = "true"
  vpc_security_group_ids   = [aws_security_group.vpc1_sec.id]
  tags = local.tags_common2
 #  lifecycle {
  #  prevent_destroy = true
  #}
}

resource "aws_security_group" "vpc1_sec" {
  name        = "vpc1sg"
  description = "Security Group db"
  vpc_id      = aws_vpc.vpc1.id

  ingress {
    description = "Allow port SSH"
    from_port   = 22
    to_port     = 22
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }


  egress {
    description = "Allow ALL ports"
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["0.0.0.0/0"]
  }

  tags = local.tags_common
}

resource "aws_security_group" "vpc2_sec" {
  name        = "vpc2sg"
  description = "Security Group vpc2"
  vpc_id      = aws_vpc.vpc2.id

  ingress {
    description = "Allow port SSH"
    from_port   = 22
    to_port     = 22
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }


  egress {
    description = "Allow ALL ports"
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["0.0.0.0/0"]
  }

  tags = local.tags_common2
}

output "publicip" { 
 value = aws_instance.myins.public_ip
}

