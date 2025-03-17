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

