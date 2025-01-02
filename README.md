# Church Attendance System

## Overview
The **Church Attendance System** is a web-based application designed to streamline the process of recording and managing attendance for church services and events. It utilizes QR code scanning for efficient and accurate attendance tracking, providing a simple and effective solution for churches.

---

## Features
- **QR Code Scanning:** Facilitates quick check-in and check-out processes for attendees.
- **User Authentication:** Ensures secure access for both administrators and users.
- **Dashboard:** Provides an overview of attendance statistics and other relevant data.
- **Event Management:** Create and manage church events with ease.
- **Responsive Design:** Accessible on various devices, including desktops and mobile devices.

---

## Technologies Used
- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL

---

## Installation

### Prerequisites
- PHP (Ensure PHP 7.x or higher is installed)
- MySQL
- A web server (e.g., Apache or Nginx)
- Git

### Steps
1. **Clone the Repository:**
   ```bash
   git clone https://github.com/0Maxbon0/Church-attendance-system.git
   ```

2. **Navigate to the Project Directory:**
   ```bash
   cd Church-attendance-system
   ```

3. **Install Dependencies:**
   Configure your web server and ensure PHP and MySQL are properly set up. Edit the `connection.php` file to match your database configuration.

4. **Database Setup:**
   - Create a MySQL database named `church_attendance`.
   - Import the provided SQL file into the database to set up the necessary tables.

5. **Run the Application:**
   - Start your web server.
   - Access the application in your browser through the configured local host address.

---

## Usage

1. **Admin Access:**
   - Log in with administrator credentials to manage users and view attendance reports.

2. **User Access:**
   - Users can log in to view their attendance records and update their profiles.

3. **Attendance Recording:**
   - Use the QR code scanning feature to mark attendance during church events.

---

## Project Structure
```
Church-attendance-system/
|-- index.php        # Main entry point of the application
|-- connection.php   # Database configuration file
|-- /assets          # Frontend assets (CSS, JS, images)
|-- /includes        # Reusable components and logic
|-- /views           # User interface pages
|-- /sql             # SQL scripts for database setup
```

---

## Contributing

Contributions are welcome! Follow these steps to contribute:

1. **Fork the Repository.**
2. **Create a New Branch:**
   ```bash
   git checkout -b feature-name
   ```
3. **Commit Your Changes:**
   ```bash
   git commit -m 'Add some feature'
   ```
4. **Push to the Branch:**
   ```bash
   git push origin feature-name
   ```
5. **Open a Pull Request** on GitHub.

---

## Contact
For any questions or suggestions, feel free to contact the repository owner at:
- **GitHub:** [0Maxbon0](https://github.com/0Maxbon0)


---

**Note:** Ensure all environment variables and configurations are properly set before running the application.
