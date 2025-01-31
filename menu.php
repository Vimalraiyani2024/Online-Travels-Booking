﻿<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Show Hide Dropdown Using CSS</title>
<style type="text/css">
    ul{
        padding: 0;
        list-style: none;
    }
    ul li{
        float: left;
        width: 100px;
        text-align: center;
        line-height: 21px;
    }
    ul li a{
        display: block;
        padding: 5px 10px;
        color: #333;
        background: #f2f2f2;
        text-decoration: none;
    }
    ul li a:hover{
        color: #fff;
        background: #939393;
    }
    ul li ul{
        display: none;
    }
    ul li:hover ul{
        display: block; /* display the dropdown */
    }
</style>
</head>
<body>
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li>
            <a href="#">Products &#9662;</a>
            <ul>
                <li><a href="#">Laptops</a></li>
                <li><a href="#">Monitors</a></li>
                <li><a href="#">Printers</a></li>
            </ul>
        </li>
        <li><a href="#">Contact</a></li>
    </ul>
</body>
</html>                                		