# 🚀 Scalable Web Application Deployment with Auto Scaling and Load Balancing

This project demonstrates the deployment of a **Scalable Web Application** on **AWS Cloud Infrastructure** utilizing key services like **EC2**, **RDS**, **IAM**, **CloudWatch**, **SNS**, **Application Load Balancer (ALB)**, and **Auto Scaling Group (ASG)**.

The application is a **simple login form** (`index.html`, `style.css`, `form.php`) hosted on **EC2 instances**. Upon submitting the form, user data is securely stored in a **MySQL database on Amazon RDS**. The architecture ensures **high availability**, **fault tolerance**, and **scalability** by automatically adding/removing instances based on load.

---

## 🛠️ Technologies & AWS Services Used

| 🖥️ Service / Tech             | 🔧 Purpose                                          |
|-------------------------------|-----------------------------------------------------|
| **Amazon EC2**                | Hosts the web application (Apache/PHP)             |
| **Application Load Balancer** | Distributes incoming traffic across EC2 instances  |
| **Auto Scaling Group (ASG)**  | Automatically scales the number of EC2 instances   |
| **Amazon RDS (MySQL)**        | Stores user form submissions securely              |
| **IAM Roles & Policies**      | Secure access and permission management            |
| **Amazon CloudWatch**         | Monitors metrics and triggers alarms               |
| **SNS (Simple Notification Service)** | Sends notifications on alarms or scaling events |
| **Apache / PHP**              | Web server and backend logic                       |

---

## 📁 Project Structure
📂 project-directory ┣ 📄 index.html - Login form frontend ┣ 📄 style.css - Styling for the login form ┗ 📄 form.php - Backend PHP script to store form data in RDS


### ✅ How It Works

1. **User Access**  
   The user accesses the application via the **ALB DNS name**.

2. **Form Submission**  
   The user submits the **login form** (`index.html`).  
   `form.php` processes the data and inserts it into **Amazon RDS MySQL**.

3. **Auto Scaling**  
   When **CPU utilization increases** (simulated using stress tools),  
   **CloudWatch Alarms** are triggered, and **ASG launches additional EC2 instances**.  
   These new instances automatically register with the **ALB** and start serving traffic.

4. **Notifications**  
   **SNS** sends email notifications when scaling events or CloudWatch alarms occur.

---

## 🏗️ Deployment Steps

### 1️⃣ Launch RDS (MySQL)
- Launch an **RDS MySQL** instance.
- Configure **Security Groups** to allow access from EC2 instances.
- Note down the **Endpoint**, **Username**, and **Password** for database connectivity.

### 2️⃣ Create IAM Role
- Create an **IAM Role** for EC2 instances to access **CloudWatch** and **RDS** securely.
- Attach the IAM role to your **EC2 instances**.

### 3️⃣ Launch EC2 Instances
- Install **Apache**, **PHP**, and **MySQL client**:
  ```bash
  sudo yum update -y
  sudo yum install -y httpd php php-mysqlnd
  sudo systemctl start httpd
  sudo systemctl enable httpd

