<!DOCTYPE html>
<p align="center">
    <a href="https://manageel.milebits.com" target="_blank">
        <img src="https://manageel.milebits.com/images/logo.svg" width="15%" height="auto" alt="Milebits Systems - ManageEL Hosting Manager"/>
        <h1 align="center">Manage EL - Hosting Manager</h1>
    </a>
    <h3 align="center">ManageEL is an online Linux-based graphical interface (GUI) used as a control panel to simplify website and server management. ManageEL allows you to publish websites, manage domains, organize web files, create email accounts, and more.</h3>
</p>

# Requirements

## Hardware
You will need to have a red hat version of Linux, preferably CentOS 7 or higher.
# How to install
## Installing the required software
```bash
sudo yum install nano wget epel-release -y
```
## Installing the required sofware
```bash
sudo yum install screen -y
```
## Updating your system
```bash
sudo yum clean all
sudo yum update -y
sudo yum upgrade -y
```
## Downloading the installer
```bash
cd /home
sudo wget https://secure.milebits.com/manageel/installer/latest
sudo chmod +x latest
```
## Installing ManageEL
```bash
sudo screen -R ManageELInstallation
cd /home
sudo sh ./latest
```
Sit back and wait for the installation to finish ! And you are done 😇.
# Contributions
If in any case while using this package, and you which to request a new functionality to it, please contact us at
suggestions@os.milebits.com and mention the package you are willing to contribute or suggest a new functionality, <a href="mailto:suggestions@os.milebits.com?subject=Contribution%20To%20milebits/manageel" target="__blank">or by using this link</a>
# Vulnerabilities
If in any case while using this package, you encounter security issues or security vulnerabilities, please do report
them as soon as possible by issuing an issue here in Github or by sending an email to security@os.milebits.com with the
mention **Vulnerability Report milebits/manageel** as your subject, <a href="mailto:security@os.milebits.com?subject=Vulnerability%20Report%20milebits/manageel" target="__blank">or by using this link</a>
