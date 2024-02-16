<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .gallery-container {
            display: flex;
            justify-content: center;
        }

        .thumbnails {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .thumbnails img {
            width: 28px;
            height: 28px;
            cursor: pointer;
        }

        .scrollbar {
            width: 1px;
            height: 340px;
            background: #ccc;
            display: block;
            margin: 0 8px 0 0;
        }

        .thumb {
            width: 1px;
            position: absolute;
            height: 340px;
            background: #000;
        }

        .slides {
            margin: 0 16px;
            display: grid;
            grid-auto-flow: row;
            gap: 1rem;
            width: calc(340px + 1rem);
            padding: 0 0.25rem;
            height: 340px;
            overflow-y: auto;
            overscroll-behavior-y: contain;
            scroll-snap-type: y mandatory;
            scrollbar-width: none;
        }

        .slides>div {
            scroll-snap-align: start;
        }

        .slides img {
            width: 540px;
            object-fit: contain;
        }

        .slides::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body>
    
</body>
</html>