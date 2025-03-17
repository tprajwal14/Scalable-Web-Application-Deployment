Scalable Web Application Deployment with Auto Scaling and Load Balancing
This project demonstrates the deployment of a Scalable Web Application on AWS infrastructure using EC2, RDS, IAM, CloudWatch, SNS, Application Load Balancer (ALB), and Auto Scaling Group (ASG).

The application is a simple login form (index.html, style.css, form.php) hosted on EC2 instances. Upon submitting the form, user data is stored in a MySQL database on Amazon RDS. The architecture ensures high availability, fault tolerance, and scalability by automatically adding/removing instances based on load.

🛠️ Technologies & AWS Services Used
Amazon EC2: Hosts the web application.
Application Load Balancer (ALB): Distributes incoming traffic across EC2 instances.
Auto Scaling Group (ASG): Automatically scales the number of EC2 instances.
Amazon RDS (MySQL): Stores user form submissions.
IAM Roles & Policies: Secure access and permissions.
CloudWatch: Monitors metrics and triggers alarms.
SNS (Simple Notification Service): Sends notifications when scaling events or alarms are triggered.
Apache / PHP: Web server and backend logic.
📁 Project Structure 
/project-directory
│
├── index.html       # Login form frontend
├── style.css        # Styling for the login form
└── form.php         # Backend PHP script to store form data in RDS
⚙️ Architecture Overview
EC2 Instances host the application files (index.html, style.css, form.php).
An Application Load Balancer (ALB) routes HTTP requests to healthy instances in the Auto Scaling Group (ASG).
ASG dynamically adjusts the number of instances based on CPU utilization or traffic load (simulated using stress tools).
RDS (MySQL) stores the user data collected from the login form.
CloudWatch Alarms monitor EC2 CPU utilization.
If thresholds are crossed, ASG scales out (adds instances) or scales in (removes instances).
SNS notifies the admin via email when alarms are triggered.

🚀 How It Works
User Access:
The user accesses the application via the ALB DNS name.
Form Submission:
The user submits the login form (index.html).
form.php processes the data and inserts it into the RDS MySQL database.
Auto Scaling:
When CPU usage increases (simulated with a stress tool), CloudWatch Alarms are triggered.
ASG launches additional EC2 instances.
The new instances automatically register with the ALB and start serving requests.
Notifications:
SNS sends alerts when scaling events or CloudWatch Alarms occur.

🏗️ Deployment Steps
1. Launch RDS (MySQL)
Create an RDS MySQL database instance.
Configure security groups to allow access from EC2 instances.
Note the Endpoint, Username, and Password.
2. Create IAM Role
Create an IAM role for EC2 instances to access CloudWatch and RDS securely.
Attach the role to your EC2 instances.
3. Launch EC2 Instances (with User Data or Manual Setup)
Install Apache, PHP, and MySQL client:

bash
Copy
Edit
sudo yum update -y
sudo yum install -y httpd php php-mysqlnd
Deploy your index.html, style.css, and form.php files to /var/www/html/.

Update form.php with your RDS database credentials.

4. Create Application Load Balancer (ALB)
Configure listeners on port 80.
Add target group and register EC2 instances.
Attach the ALB DNS to access the application.
5. Configure Auto Scaling Group (ASG)
Define minimum, desired, and maximum capacity.
Attach to your ALB target group.
Set scaling policies based on CPU Utilization (CloudWatch).
6. Set Up CloudWatch Alarms & SNS
Create alarms for CPU utilization thresholds.
Subscribe an email endpoint to SNS topics.
Link alarms to trigger ASG policies and send SNS notifications.

📧 Notifications
Subscribe your email to the SNS topic to receive alerts when:
CPU utilization crosses the threshold.
Auto Scaling events occur.

🎉 Result
Users can submit login data through the form.
Data is stored in the RDS database.
The system automatically scales based on traffic, ensuring high availability and performance.
