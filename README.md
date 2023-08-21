# Image Upload and Thumbnail Creation with PHP and MySQL

Welcome to my GitHub repository showcasing an image upload and thumbnail creation script implemented using PHP and MySQL. This project demonstrates my skills in working with databases, file uploads, and image manipulation.

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [License](#license)

## Introduction

This repository contains a PHP script that connects to a MySQL database and allows users to upload images through a simple form. The uploaded images are stored on the server, and the script also generates thumbnail versions of the images using the GD image library. The image details, including the original image name and the path to the thumbnail, are stored in the database.

## Features

- Connect to a MySQL database for CRUD operations.
- Upload images through a form.
- Check if uploaded files are valid images.
- Generate thumbnail images using the GD image library.
- Store image details in the database.

## Installation

1. Clone the repository to your local machine:

   git clone https://github.com/garimarajput748/Image-Upload-and-Store-in-DB.git

2. Set up a local server environment (such as XAMPP or WAMP) to run PHP and MySQL.

3. Create a new database and import the provided SQL dump (database.sql) to set up the required table.

4. Update the database connection details in the PHP script (index.php) to match your local  database  configuration.

## Usage

1. Start your local server environment.

2. Navigate to the project directory using your web browser.

3. Use the provided form to upload an image.

4. The uploaded image will be stored on the server, and a thumbnail version will be generated and saved as well.

5. Image details will be inserted into the database.

## License

This project is licensed under the MIT License.




