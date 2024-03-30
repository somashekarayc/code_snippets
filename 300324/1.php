<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        section {
            padding: 20px;
            margin: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-top: 0;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<header>
        <h1>Your Name</h1>
        <p>Professional Portfolio</p>
    </header>

    <section id="about">
        <h2>About Me</h2>
        <p>Welcome to my portfolio website! I am a [Your Profession/Expertise] passionate about [Your Passion/Specialization]. I have [X] years of experience in the field and have worked on various projects ranging from [Mention Project Types]. Feel free to explore my portfolio and get in touch!</p>
    </section>
    
    <section id="portfolio">
        <h2>Portfolio</h2>
        <div>
            <h3>Project Title 1</h3>
            <p>Description of Project 1.</p>
            <p><a href="#">View Project</a></p>
        </div>
        <div>
            <h3>Project Title 2</h3>
            <p>Description of Project 2.</p>
            <p><a href="#">View Project</a></p>
        </div>
        <!-- Add more projects as needed -->
    </section>
</body>
</html>