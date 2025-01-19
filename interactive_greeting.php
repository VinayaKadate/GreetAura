<?php
// Get current hour, date, and time
$hour = date("H");
$currentDate = date("l, F j, Y");
$currentTime = date("h:i A");

// Determine greeting and background image
if ($hour < 12) {
    $greeting = "Good Morning";
    $bgImage = "morning.jpg"; // Replace with a morning-themed image
    $quote = "Rise and shine! Today is full of opportunities.";
} elseif ($hour < 18) {
    $greeting = "Good Afternoon";
    $bgImage = "afternoon.jpg"; // Replace with an afternoon-themed image
    $quote = "Keep going! You're halfway through the day.";
} elseif ($hour < 21) {
    $greeting = "Good Evening";
    $bgImage = "evening.jpg"; // Replace with an evening-themed image
    $quote = "Relax and unwind; you've earned it.";
} else {
    $greeting = "Good Night";
    $bgImage = "night.jpg"; // Replace with a night-themed image
    $quote = "Rest well for a brighter tomorrow.";
}

// Handle user input
$name = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Greeting Generator</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('<?php echo $bgImage; ?>') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            text-align: center;
        }
        .container {
            margin: 100px auto;
            padding: 20px;
            max-width: 600px;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            font-size: 2.5em;
            margin: 10px 0;
            animation: fadeIn 2s ease;
        }
        h2 {
            font-size: 2em;
            margin: 20px 0;
        }
        p {
            font-size: 1.2em;
        }
        form {
            margin: 20px 0;
        }
        input[type="text"] {
            padding: 10px;
            font-size: 1.1em;
            width: 80%;
            border: none;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            font-size: 1.1em;
            background: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background: #218838;
        }
        .quote {
            font-style: italic;
            margin: 20px 0;
            color: #ddd;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Interactive Greeting Generator</h1>
        <p>Today is <strong><?php echo $currentDate; ?></strong>. The time is <strong><?php echo $currentTime; ?></strong>.</p>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Enter your name" required>
            <button type="submit">Show Greeting</button>
        </form>

        <?php if (!empty($name)): ?>
            <h2><?php echo "$greeting, $name!"; ?></h2>
            <p class="quote"><?php echo $quote; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>