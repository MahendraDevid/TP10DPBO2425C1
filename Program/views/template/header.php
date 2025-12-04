<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diecast Garage Management</title>
    <style>
        /* --- RESET & GLOBAL --- */
        * { box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            color: #333;
        }
        h3 { color: #d32f2f; margin-bottom: 20px; border-bottom: 2px solid #ddd; padding-bottom: 10px; }
        
        /* --- CONTAINER --- */
        .container {
            max-width: 1000px;
            margin: 30px auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        /* --- NAVIGATION --- */
        .navbar {
            background-color: #2c3e50; /* Dark Blue-Grey */
            overflow: hidden;
            padding: 0 15%;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }
        .navbar a:hover { background-color: #d32f2f; /* Racing Red */ color: white; }
        .navbar .brand-logo { float: left; color: #ff9800; font-size: 1.2em; cursor: default; }
        .navbar .brand-logo:hover { background: none; color: #ff9800; }

        /* --- TABLES --- */
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        table th, table td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; }
        table th { background-color: #333; color: white; text-transform: uppercase; font-size: 0.9em; }
        table tr:hover { background-color: #f1f1f1; }
        
        /* --- BUTTONS --- */
        .btn {
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 0.9em;
            display: inline-block;
            cursor: pointer;
            border: none;
            transition: 0.3s;
        }
        .btn-add { background-color: #d32f2f; color: white; font-weight: bold; margin-bottom: 15px; }
        .btn-add:hover { background-color: #b71c1c; }
        
        .btn-edit { background-color: #ff9800; color: white; }
        .btn-edit:hover { background-color: #e68900; }
        
        .btn-delete { background-color: #555; color: white; }
        .btn-delete:hover { background-color: #333; }
        
        .btn-save { background-color: #27ae60; color: white; padding: 10px 20px; font-size: 1em; }
        .btn-cancel { background-color: #7f8c8d; color: white; padding: 10px 20px; }

        /* --- FORMS --- */
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; color: #555; }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
        }
        input:focus, select:focus { border-color: #d32f2f; outline: none; }
    </style>
</head>
<body>