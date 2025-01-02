const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql2');
const cors = require('cors'); // Import the cors middleware

const app = express();

// Use the cors middleware
app.use(cors());

// Create a connection pool
const pool = mysql.createPool({
    host: 'localhost',
    user: 'root',
    password: 'avamina1',
    database: 'Web_Database',
    waitForConnections: true,
    connectionLimit: 10, // Adjust the connection limit as needed
    queueLimit: 0
});

// Middleware to parse JSON bodies
app.use(bodyParser.json());

// POST endpoint to receive data and save it to the database
// POST endpoint to receive data and save it to the database
app.post('/saveData', (req, res) => {
    const receivedData = req.body.data;
    console.log('Received data:', receivedData); // Log the received data
    
    // Convert receivedData to an integer
    const intValue = parseInt(receivedData);

    // Check if the conversion was successful
    if (isNaN(intValue)) {
        console.error('Error: Received data is not a valid integer');
        res.status(400).send('Received data is not a valid integer');
        return;
    }

    // Insert intValue into the database
    const sql = "UPDATE Ma5domen SET first_name=CONCAT(first_name, '🗹') WHERE id=?";
    pool.query(sql, [intValue], (err, result) => {
        if (err) {
            console.error('Error inserting data into database:', err);
            res.status(500).send('An error occurred while saving the data');
        } else {
            console.log('Data inserted into database successfully');
            res.send({ message: 'Data received and saved successfully' });
        }
    });
});


// Start the server
const port = 3000;
app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
});
