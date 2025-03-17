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
   sudo apt update -y
   sudo apt upgrade -y


   sudo apt install -y nginx php php-mysql

   sudo systemctl start nginx
   sudo systemctl enable nginx

   Install MySQL client to interact with RDS databases
sudo apt install -y mysql-client

   Verify NGINX is running
sudo systemctl status nginx


Deploy your index.html, style.css, and form.php files to /var/www/html/.
Update form.php with your RDS database credentials.

4️⃣ Create Application Load Balancer (ALB)
Configure the ALB to listen on port 80.
Create a Target Group and register your EC2 instances.
Use the ALB DNS to access the application.

5️⃣ Configure Auto Scaling Group (ASG)
Define min, desired, and max capacity.
Attach the ALB Target Group.
Set scaling policies based on CPU Utilization (monitored via CloudWatch).

6️⃣ Set Up CloudWatch Alarms & SNS
Create CloudWatch Alarms for CPU utilization thresholds (e.g., >70%).
Create an SNS Topic and subscribe your email for notifications.
Link alarms to trigger ASG scaling actions and send SNS notifications.

📧 Notifications (SNS)
Subscribe to the SNS Topic to receive alerts when:
CPU utilization crosses thresholds.
Auto Scaling events (scale-in or scale-out) occur.
You will receive email alerts keeping you informed of infrastructure scaling and health.

🎉 Result
✅ Users can submit their login data through the form.

✅ Data is securely stored in Amazon RDS.

✅ The system automatically scales in or out based on traffic and CPU load.

✅ SNS Notifications inform you of important scaling events.

✅ Achieves high availability, fault tolerance, and cost optimization.


