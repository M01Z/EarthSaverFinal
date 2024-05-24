<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Collaboration Earth Carbon Search System (CECSS)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }

        .text-content {
            flex: 1;
            padding-right: 20px;
        }

        .text-content h1, .text-content h2 {
            color: #333;
        }

        .text-content p {
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .purpose-section {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
        }

        .purpose-section h2 {
            color: #555;
        }

        .purpose-section p {
            margin-bottom: 10px;
        }

        .image {
            flex: 1;
            max-width: 300px;
            padding-left: 20px;
            text-align: center;
        }

        .image img {
            max-width: 100%;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-content">
            <h1>About Collaboration Earth Carbon Search System (CECSS)</h1>
            <p>Collaboration Earth Carbon Search System (CECSS) is a powerful tool designed to unveil the carbon emissions of products. Developed by Collaboration Earth (CE), it provides transparency in our quest for a greener future.</p>
            
            <div class="purpose-section">
                <h2>Purpose</h2>
                <p>The public searches for a specific product, this system displays the carbon emissions associated with that product under various vendors, allowing users to compare and understand which vendor offers products with lower carbon emissions. Additionally, it provides information on discounts available to Collaboration Earth (CE) members and details about each vendor's carbon strategy. Through these features, users can make informed decisions that align with their sustainability goals, contributing to a greener future.</p>
            </div>
        </div>
        <div class="image">
            <img src="{{ asset('images/ce.png') }}" alt="CECSS Image">
        </div>
    </div>
</body>
</html>
