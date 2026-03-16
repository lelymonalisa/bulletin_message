# Bulletin Message Board System

A web-based bulletin board application that allows users to create accounts, login, and post messages with customizable colors and optional images.

## Features

- **User Authentication**: Secure registration and login system with password hashing
- **Post Messages**: Users can create messages up to 100 characters
- **Message Styling**: Choose message color (Black, Red, Green, Blue, Yellow)
- **Image Upload**: Upload optional images with 2MB size limit
- **Delete Messages**: Users can delete their own messages
- **Anonymous Posting**: Users can post messages without logging in
- **Responsive Design**: Built with Bootstrap 5 for mobile-friendly interface

## Technology Stack

- **Backend**: PHP 8.2.4
- **Database**: MySQL/MariaDB 10.4+
- **Frontend**: HTML5, CSS3, Bootstrap 5.2.2
- **Server Support**: Localhost, Heroku (JAWSDB/ClearDB)

## File Structure
```
bulletin_message/
├── index.php              # Main page (post messages)
├── login.php              # Login page
├── registration.php       # Registration page
├── logout.php             # Logout functionality
├── show_message.php       # Display all messages
├── delete_message.php     # Delete message functionality
├── database.php           # Database connection
├── style.css              # Custom styling
├── message_bulleting.sql  # Database dump
└── uploaded_img/          # Image storage folder
```

## Installation

### Requirements
- PHP 8.0+
- MySQL/MariaDB
- Web Server (Apache/Nginx)

### Local Setup

1. **Clone or download the repository**
   ```bash
   git clone https://github.com/lelymonalisa/bulletin_message.git
2. **Copy Project ke Folder Web Server**
3. **Import database message_bulleting.sql**
