    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        /* Sidebar Styling */
        .sidebar {
            background-color: #4682B4;
            min-height: 100vh;
            padding: 20px;
        }
        .sidebar a {
            color: #ffffff;
            text-decoration: none;
            display: block;
            margin: 10px 0;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .sidebar a:hover {
            background-color: #87CEEB;
        }
        .sidebar .active {
            background-color: #87CEEB;
            font-weight: bold;
        }

        /* Responsive Sidebar */
        .sidebar-collapse {
            display: none;
        }
        @media (max-width: 768px) {
            .sidebar {
                position: absolute;
                z-index: 1030;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .sidebar-collapse {
                display: block;
                background-color: #4682B4;
                border: none;
                color: #ffffff;
                padding: 10px 15px;
            }
        }

        /* Content Styling */
        .content {
            padding: 20px;
        }

        /* Overview Boxes */
        .overview-box {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
        .overview-box h3 {
            font-size: 1.5rem;
            color: #4682B4;
        }
        .overview-box p {
            font-size: 1.2rem;
            font-weight: bold;
            margin: 0;
        }
        .overview-box.present {
            border-left: 5px solid #28a745; /* Green */
        }
        .overview-box.absent {
            border-left: 5px solid #dc3545; /* Red */
        }
        .overview-box.total {
            border-left: 5px solid #007bff; /* Blue */
        }

        /* Button Styling */
        .btn-send-balance {
            background-color: #4682B4;
            color: #ffffff;
            font-weight: bold;
            border-radius: 25px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .btn-send-balance:hover {
            background-color: #87CEEB;
            transform: scale(1.05);
        }

        .table-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-select {
            border-radius: 5px;
        }
    </style>