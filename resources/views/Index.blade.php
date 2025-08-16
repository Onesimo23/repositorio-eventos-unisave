<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repositório Digital de Eventos - UniSave</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            width: 100%;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #1a237e, #311b92);
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 60px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo img {
            height: 40px;
        }

        .logo-text {
            font-size: 2rem;
            font-weight: 700;
            color: white;
            letter-spacing: 2px;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
            align-items: center;
            flex-wrap: wrap;
        }

        .nav-links a {
            text-decoration: none;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .nav-links a:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            transform: translateY(-2px);
        }

        .nav-links a.login-btn {
            background: transparent;
            border: 2px solid white;
            color: white;
        }

        .nav-links a.register-btn {
            background: white;
            color: #1a237e;
        }

        .nav-links a:not(.login-btn):not(.register-btn)::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: white;
            transition: width 0.3s ease;
        }

        .nav-links a:not(.login-btn):not(.register-btn):hover::after {
            width: 80%;
        }

        /* Banner */
        .banner {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 4rem 0;
            text-align: center;
            color: white;
            margin: 2rem 0;
            border-radius: 20px;
            position: relative;
            overflow: hidden;
        }

        .banner::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .banner h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 1;
        }

        .banner p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            z-index: 1;
        }

        .cta-btn {
            display: inline-block;
            background: rgba(255, 255, 255, 0.9);
            color: #667eea;
            padding: 1rem 2rem;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .cta-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            background: white;
        }

        /* Destaques */
        .highlights {
            margin: 4rem auto;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .highlights h2 {
            color: #1a237e;
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2.5rem;
        }

        .highlights-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }

        .highlight-main {
            background: linear-gradient(135deg, #1a237e, #311b92);
            border-radius: 15px;
            padding: 2rem;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .highlight-content {
            position: relative;
            z-index: 2;
        }

        .highlight-tag {
            background: rgba(255, 255, 255, 0.2);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            display: inline-block;
        }

        .highlight-main h3 {
            font-size: 2rem;
            margin: 1rem 0;
        }

        .highlight-info {
            display: flex;
            gap: 2rem;
            margin: 1rem 0;
        }

        .highlight-btn {
            display: inline-block;
            background: white;
            color: #1a237e;
            padding: 0.8rem 2rem;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            margin-top: 1rem;
            transition: transform 0.3s ease;
        }

        .highlight-btn:hover {
            transform: translateY(-2px);
        }

        .highlight-secondary {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .highlight-secondary h4 {
            color: #1a237e;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .highlight-list {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .highlight-item {
            display: flex;
            gap: 1rem;
            align-items: center;
            padding: 1rem;
            border-radius: 10px;
            transition: background 0.3s ease;
            cursor: pointer;
        }

        .highlight-item:hover {
            background: rgba(26, 35, 126, 0.05);
        }

        .highlight-item .date {
            background: #f0f2ff;
            color: #1a237e;
            padding: 0.5rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            text-align: center;
            min-width: 70px;
        }

        .highlight-item .info h5 {
            color: #1a237e;
            margin-bottom: 0.3rem;
        }

        .highlight-item .info p {
            color: #666;
            font-size: 0.9rem;
        }

        /* Cards de Eventos */
        .events-section {
            margin: 3rem auto;
            max-width: 1200px;
            padding: 0 20px;
        }

        .events-section h2 {
            text-align: center;
            color: white;
            font-size: 2.5rem;
            margin-bottom: 2rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .event-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            position: relative;
            max-width: 100%;
            margin: 0 auto;
        }

        .event-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .event-image {
            height: 200px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: white;
        }

        .event-content {
            padding: 1.5rem;
        }

        .event-title {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #333;
        }

        .event-details {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .event-detail {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #666;
            font-size: 0.9rem;
        }

        .event-btn {
            display: inline-block;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 0.7rem 1.5rem;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-align: center;
        }

        .event-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        /* Footer */
        .footer {
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 3rem 0 1rem;
            margin-top: 4rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h4 {
            margin-bottom: 1rem;
            color: #667eea;
        }

        .footer-section a {
            color: #ccc;
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: #667eea;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid #444;
            color: #999;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .nav {
                flex-direction: column;
                gap: 1rem;
            }

            .nav-links {
                gap: 1rem;
            }

            .banner h1 {
                font-size: 2rem;
            }

            .banner p {
                font-size: 1rem;
            }

            .filter-group {
                flex-direction: column;
                align-items: flex-start;
            }

            .events-grid {
                grid-template-columns: 1fr;
            }

            /* Novo CSS para o header */
            .search-container {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.8);
                display: none;
                justify-content: center;
                align-items: flex-start;
                padding-top: 100px;
                z-index: 1001;
            }

            .search-box {
                width: 600px;
                max-width: 90%;
                background: white;
                border-radius: 8px;
                padding: 2rem;
                position: relative;
            }

            .search-close {
                position: absolute;
                right: 1rem;
                top: 1rem;
                background: none;
                border: none;
                font-size: 1.5rem;
                cursor: pointer;
                color: #666;
            }

            .search-input {
                width: 100%;
                padding: 1rem;
                border: 2px solid #eee;
                border-radius: 4px;
                font-size: 1.1rem;
                margin-bottom: 1rem;
            }

            .search-results {
                max-height: 400px;
                overflow-y: auto;
            }

            .search-result-item {
                padding: 1rem;
                border-bottom: 1px solid #eee;
                cursor: pointer;
                transition: background 0.3s;
            }

            .search-result-item:hover {
                background: #f8f9fa;
            }

            /* CSS para o modal */
            .modal {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.8);
                z-index: 1002;
                overflow-y: auto;
            }

            .modal-content {
                background: white;
                width: 800px;
                max-width: 90%;
                margin: 50px auto;
                border-radius: 12px;
                position: relative;
                animation: modalSlideIn 0.3s ease-out;
            }

            @keyframes modalSlideIn {
                from {
                    transform: translateY(-100px);
                    opacity: 0;
                }

                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }

            .modal-header {
                padding: 2rem;
                background: linear-gradient(45deg, #667eea, #764ba2);
                color: white;
                border-radius: 12px 12px 0 0;
            }

            .modal-body {
                padding: 2rem;
            }

            .modal-close {
                position: absolute;
                right: 1rem;
                top: 1rem;
                background: none;
                border: none;
                color: white;
                font-size: 1.5rem;
                cursor: pointer;
            }

            /* Estilos do Carrossel */
            .carousel-section {
                margin-top: 80px;
                position: relative;
                height: 500px;
                overflow: hidden;
            }

            .carousel-container {
                position: relative;
                height: 100%;
                width: 100%;
            }

            .carousel-slides {
                height: 100%;
                width: 100%;
            }

            .carousel-slide {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                opacity: 0;
                transition: opacity 0.5s ease-in-out;
            }

            .carousel-slide.active {
                opacity: 1;
            }

            .slide-image {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }

            .slide-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .slide-content {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
                color: white;
                z-index: 2;
                width: 80%;
                padding: 2rem;
                background: rgba(0, 0, 0, 0.5);
                border-radius: 10px;
            }

            .slide-content h2 {
                font-size: 3rem;
                margin-bottom: 1rem;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            }

            .slide-content p {
                font-size: 1.2rem;
                max-width: 600px;
                margin: 0 auto;
                text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
            }

            .carousel-button {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                background: rgba(0, 0, 0, 0.5);
                color: white;
                border: none;
                padding: 1rem;
                cursor: pointer;
                font-size: 1.5rem;
                z-index: 3;
                transition: background 0.3s ease;
            }

            .carousel-button:hover {
                background: rgba(0, 0, 0, 0.8);
            }

            .carousel-button.prev {
                left: 1rem;
            }

            .carousel-button.next {
                right: 1rem;
            }

            .carousel-dots {
                position: absolute;
                bottom: 1rem;
                left: 50%;
                transform: translateX(-50%);
                display: flex;
                gap: 0.5rem;
                z-index: 3;
            }

            .carousel-dot {
                width: 12px;
                height: 12px;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.5);
                cursor: pointer;
                transition: background 0.3s;
            }

            .carousel-dot.active {
                background: white;
            }

            /* Estilos atualizados para o modal */
            .event-details-full {
                display: flex;
                flex-direction: column;
                gap: 2rem;
            }

            .event-banner {
                background: linear-gradient(135deg, #1a237e, #311b92);
                height: 200px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 10px;
                margin-top: -1rem;
            }

            .event-emoji {
                font-size: 5rem;
                color: white;
                text-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            }

            .event-info-grid {
                display: grid;
                grid-template-columns: 2fr 1fr;
                gap: 2rem;
            }

            .event-metadata {
                display: flex;
                gap: 1.5rem;
                margin-bottom: 2rem;
                flex-wrap: wrap;
            }

            .event-metadata span {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                color: #666;
                font-size: 0.95rem;
            }

            .event-description {
                margin-bottom: 2rem;
            }

            .event-description h3 {
                color: #1a237e;
                margin-bottom: 1rem;
            }

            .event-description p {
                color: #444;
                line-height: 1.8;
            }

            .event-topics h3 {
                color: #1a237e;
                margin-bottom: 1rem;
            }

            .topics-list {
                list-style: none;
                padding: 0;
            }

            .topics-list li {
                padding: 0.5rem 0;
                display: flex;
                align-items: center;
                gap: 0.5rem;
                color: #444;
            }

            .topics-list li::before {
                content: '✓';
                color: #4CAF50;
                font-weight: bold;
            }

            .event-details-card {
                background: #f8f9fa;
                padding: 1.5rem;
                border-radius: 10px;
                position: sticky;
                top: 1rem;
            }

            .event-details-card h4 {
                color: #1a237e;
                margin-bottom: 1rem;
            }

            .event-details-card ul {
                list-style: none;
                padding: 0;
                margin-bottom: 1.5rem;
            }

            .event-details-card li {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.5rem 0;
                color: #666;
            }

            .inscription-btn {
                width: 100%;
                padding: 1rem;
                background: #4CAF50;
                color: white;
                border: none;
                border-radius: 25px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .inscription-btn:hover {
                background: #45a049;
                transform: translateY(-2px);
            }

            @media (max-width: 768px) {
                .event-info-grid {
                    grid-template-columns: 1fr;
                }
            }
        }

        /* Novo CSS para o header */
        .search-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: none;
            justify-content: center;
            align-items: flex-start;
            padding-top: 100px;
            z-index: 1001;
        }

        .search-box {
            width: 600px;
            max-width: 90%;
            background: white;
            border-radius: 8px;
            padding: 2rem;
            position: relative;
        }

        .search-close {
            position: absolute;
            right: 1rem;
            top: 1rem;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #666;
        }

        .search-input {
            width: 100%;
            padding: 1rem;
            border: 2px solid #eee;
            border-radius: 4px;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        .search-results {
            max-height: 400px;
            overflow-y: auto;
        }

        .search-result-item {
            padding: 1rem;
            border-bottom: 1px solid #eee;
            cursor: pointer;
            transition: background 0.3s;
        }

        .search-result-item:hover {
            background: #f8f9fa;
        }

        /* CSS para o modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 1002;
            overflow-y: auto;
        }

        .modal-content {
            background: white;
            width: 800px;
            max-width: 90%;
            margin: 50px auto;
            border-radius: 12px;
            position: relative;
            animation: modalSlideIn 0.3s ease-out;
        }

        @keyframes modalSlideIn {
            from {
                transform: translateY(-100px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-header {
            padding: 2rem;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border-radius: 12px 12px 0 0;
        }

        .modal-body {
            padding: 2rem;
        }

        .modal-close {
            position: absolute;
            right: 1rem;
            top: 1rem;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Estilos do Carrossel */
        .carousel-section {
            margin-top: 80px;
            position: relative;
            height: 500px;
            overflow: hidden;
        }

        .carousel-container {
            position: relative;
            height: 100%;
            width: 100%;
        }

        .carousel-slides {
            height: 100%;
            width: 100%;
        }

        .carousel-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .carousel-slide.active {
            opacity: 1;
        }

        .slide-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .slide-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .slide-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            z-index: 2;
            width: 80%;
            padding: 2rem;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
        }

        .slide-content h2 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .slide-content p {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .carousel-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 1rem;
            cursor: pointer;
            font-size: 1.5rem;
            z-index: 3;
            transition: background 0.3s ease;
        }

        .carousel-button:hover {
            background: rgba(0, 0, 0, 0.8);
        }

        .carousel-button.prev {
            left: 1rem;
        }

        .carousel-button.next {
            right: 1rem;
        }

        .carousel-dots {
            position: absolute;
            bottom: 1rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 0.5rem;
            z-index: 3;
        }

        .carousel-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: background 0.3s;
        }

        .carousel-dot.active {
            background: white;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <nav class="nav container">
            <a href="#" class="logo">
                <span class="logo-text">Repositório de Eventos</span>
            </a>
            <ul class="nav-links">
                <li><a href="#inicio">Início</a></li>
                <li><a href="#eventos">Eventos</a></li>
                <li><a href="#" id="search-trigger">
                        <i class="fas fa-search"></i>
                    </a></li>

                @guest
                <li><a href="{{ route('login') }}" class="login-btn">Login</a></li>
                <li><a href="{{ route('register') }}" class="register-btn">Register</a></li>
                @endguest

                @auth
                <li>
                    <a href="{{ route('dashboard') }}" class="login-btn">
                        Entrar como {{ auth()->user()->name }}
                    </a>
                </li>
                @endauth

            </ul>
        </nav>
    </header>

    <!-- Banner -->
    <!-- Carrossel de Imagens -->
    <section class="carousel-section">
        <div class="carousel-container">
            <div class="carousel-slides">
                <div class="carousel-slide active">
                    <div class="slide-image">
                        <img src="{{ asset('DSC_0353.JPG') }}" alt="Evento UniSave">
                    </div>
                    <div class="slide-content">
                        <h2>Eventos Acadêmicos</h2>
                        <p>Participe dos melhores eventos acadêmicos da UniSave</p>
                    </div>
                </div>
                <div class="carousel-slide">
                    <div class="slide-image">
                        <img src="{{ asset('DSC_0350.JPG') }}" alt="Palestras UniSave">
                    </div>
                    <div class="slide-content">
                        <h2>Palestras Inspiradoras</h2>
                        <p>Conheça especialistas e amplie seus horizontes</p>
                    </div>
                </div>
                <div class="carousel-slide">
                    <div class="slide-image">
                        <img src="{{ asset('DSC_0348.JPG') }}" alt="Workshops UniSave">
                    </div>
                    <div class="slide-content">
                        <h2>Workshops Práticos</h2>
                        <p>Desenvolva novas habilidades com nossos workshops especializados</p>
                    </div>
                </div>
                <div class="carousel-slide">
                    <div class="slide-image">
                        <img src="{{ asset('DSC_0354.JPG') }}" alt="Seminários UniSave">
                    </div>
                    <div class="slide-content">
                        <h2>Seminários Acadêmicos</h2>
                        <p>Participe de discussões enriquecedoras e troca de conhecimentos</p>
                    </div>
                </div>
            </div>
            <button class="carousel-button prev">&#10094;</button>
            <button class="carousel-button next">&#10095;</button>
            <div class="carousel-dots"></div>
        </div>
    </section>
    <br>

    <!-- Destaques da Semana -->
    <section class="highlights container">
        <h2>Destaques da Semana</h2>
        <div class="highlights-grid">
            <!-- Destaque Principal -->
            <div class="highlight-main">
                @if($eventoDestaque)
                <div class="highlight-content">
                    <span class="highlight-tag">Em Destaque</span>
                    <h3>{{ $eventoDestaque->titulo }}</h3>
                    <p>{{ $eventoDestaque->descricao }}</p>
                    <div class="highlight-info">
                        <span>📅 {{ \Carbon\Carbon::parse($eventoDestaque->data)->format('d/m/Y') }} {{ $eventoDestaque->hora }}</span>
                        <span>📍 {{ $eventoDestaque->local }}</span>
                    </div>
                    <a href="{{ route('eventos.show', $eventoDestaque->id) }}" class="highlight-btn">Saiba Mais</a>
                </div>
                @else
                <p>Nenhum evento em destaque no momento.</p>
                @endif
            </div>

            <!-- Destaques Secundários -->
            <div class="highlight-secondary">
                <h4>Próximos Destaques</h4>
                <div class="highlight-list">
                    @forelse($eventosSecundarios as $evento)
                    <div class="highlight-item">
                        <span class="date">{{ \Carbon\Carbon::parse($evento->data)->format('d M') }}</span>
                        <div class="info">
                            <h5>{{ $evento->titulo }}</h5>
                            <p>{{ $evento->descricao }}</p>
                        </div>
                    </div>
                    @empty
                    <p>Sem próximos eventos no momento.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- Próximos Eventos -->
    <section class="events-section container" id="proximos-eventos">
        <h2>📅 Próximos Eventos</h2>
        <div class="events-grid">
            @forelse($eventosProximos as $evento)
            <div class="event-card" data-event-id="{{ $evento->id }}">
                <div class="event-image">
                    {{-- Se tiver imagem no banco, mostra; senão põe emoji genérico --}}
                    @if($evento->imagem)
                    <img src="{{ asset('storage/'.$evento->imagem) }}" alt="{{ $evento->titulo }}" style="width:100%; border-radius:8px;">
                    @else
                    🎉
                    @endif
                </div>
                <div class="event-content">
                    <h3 class="event-title">{{ $evento->titulo }}</h3>
                    <div class="event-details">
                        <div class="event-detail">
                            <span>📅</span>
                            <span>{{ \Carbon\Carbon::parse($evento->data)->translatedFormat('d \d\e F, Y') }} - {{ $evento->hora }}</span>
                        </div>
                        <div class="event-detail">
                            <span>📍</span>
                            <span>{{ $evento->local }}</span>
                        </div>
                        <div class="event-detail">
                            <span>👤</span>
                            <span>{{ $evento->organizador ?? 'Organizador não definido' }}</span>
                        </div>
                    </div>
                    <a href="{{ route('eventos.show', $evento->id) }}" class="event-btn">Ver Detalhes</a>
                </div>
            </div>
            @empty
            <p>Nenhum evento disponível.</p>
            @endforelse
        </div>
    </section>

    <!-- Modal de Detalhes -->
    <div class="modal fade" id="showEventoModal{{ $evento->id }}" tabindex="-1" role="dialog" aria-labelledby="showEventoModalLabel{{ $evento->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $evento->titulo }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if($evento->imagem)
                    <img src="{{ asset('storage/'.$evento->imagem) }}"
                        alt="{{ $evento->titulo }}"
                        style="width:100%; border-radius: 8px; margin-bottom: 15px;">
                    @endif
                    <p><strong>Descrição:</strong> {{ $evento->descricao }}</p>
                    <p><strong>Data:</strong> {{ \Carbon\Carbon::parse($evento->data)->translatedFormat('d \d\e F, Y') }}</p>
                    <p><strong>Hora:</strong> {{ $evento->hora }}</p>
                    <p><strong>Local:</strong> {{ $evento->local }}</p>
                    <p><strong>Organizador:</strong> {{ $evento->organizador }}</p>
                    <p><strong>Status:</strong> {{ ucfirst($evento->status) }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Template do Modal atualizado -->
    <div class="modal" id="event-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modal-title"></h2>
                <button class="modal-close">&times;</button>
            </div>
            <div class="modal-body" id="modal-body">
                <div class="event-details-full">
                    <div class="event-banner">
                        <div class="event-emoji"></div>
                    </div>
                    <div class="event-info-grid">
                        <div class="event-main-info">
                            <div class="event-metadata">
                                <span class="event-date"></span>
                                <span class="event-location"></span>
                                <span class="event-organizer"></span>
                            </div>
                            <div class="event-description">
                                <h3>Sobre o Evento</h3>
                                <p></p>
                            </div>
                            <div class="event-topics">
                                <h3>O que você vai aprender</h3>
                                <ul class="topics-list"></ul>
                            </div>
                        </div>
                        <div class="event-sidebar">
                            <div class="event-details-card">
                                <h4>Detalhes do Evento</h4>
                                <ul>
                                    <li><i>👥</i> <span class="vagas">50 vagas disponíveis</span></li>
                                    <li><i>⏰</i> <span class="duracao">2 horas</span></li>
                                    <li><i>📍</i> <span class="local-completo"></span></li>
                                </ul>
                                <button class="inscription-btn">Inscrever-se no Evento</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Universidade Save</h4>
                    <p>📧 eventos@unisave.edu.mz</p>
                    <p>📞 +258 21 123 4567</p>
                    <p>📍 Av. Julius Nyerere, 1234<br>Maputo, Moçambique</p>
                </div>
                <div class="footer-section">
                    <h4>Links Úteis</h4>
                    <a href="#">Site Oficial da UniSave</a>
                    <a href="#">Biblioteca Digital</a>
                    <a href="#">Regulamentos Acadêmicos</a>
                    <a href="#">Portal do Estudante</a>
                    <a href="#">Calendário Acadêmico</a>
                </div>
                <div class="footer-section">
                    <h4>Categorias de Eventos</h4>
                    <a href="#">Palestras</a>
                    <a href="#">Workshops</a>
                    <a href="#">Seminários</a>
                    <a href="#">Conferências</a>
                    <a href="#">Mesa Redonda</a>
                </div>
                <div class="footer-section">
                    <h4>Suporte</h4>
                    <a href="#">Central de Ajuda</a>
                    <a href="#">Como se Registrar</a>
                    <a href="#">Política de Privacidade</a>
                    <a href="#">Termos de Uso</a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Universidade Save. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Código do carrossel
            const slides = document.querySelectorAll('.carousel-slide');
            const dots = document.querySelector('.carousel-dots');
            const prevButton = document.querySelector('.carousel-button.prev');
            const nextButton = document.querySelector('.carousel-button.next');
            let currentSlide = 0;

            // Criar pontos de navegação
            slides.forEach((_, index) => {
                const dot = document.createElement('div');
                dot.classList.add('carousel-dot');
                if (index === 0) dot.classList.add('active');
                dot.addEventListener('click', () => goToSlide(index));
                dots.appendChild(dot);
            });

            // Função para mudar slide
            function goToSlide(index) {
                slides[currentSlide].classList.remove('active');
                document.querySelectorAll('.carousel-dot')[currentSlide].classList.remove('active');

                currentSlide = index;

                slides[currentSlide].classList.add('active');
                document.querySelectorAll('.carousel-dot')[currentSlide].classList.add('active');
            }

            // Eventos dos botões do carrossel
            prevButton.addEventListener('click', () => {
                const index = currentSlide === 0 ? slides.length - 1 : currentSlide - 1;
                goToSlide(index);
            });

            nextButton.addEventListener('click', () => {
                const index = currentSlide === slides.length - 1 ? 0 : currentSlide + 1;
                goToSlide(index);
            });

            // Auto-rotação do carrossel
            setInterval(() => {
                const index = currentSlide === slides.length - 1 ? 0 : currentSlide + 1;
                goToSlide(index);
            }, 5000);

            // Sistema de busca
            const searchTrigger = document.getElementById('search-trigger');
            const searchContainer = document.getElementById('search-container');
            const searchClose = document.getElementById('search-close');
            const searchInput = document.querySelector('.search-input');
            const searchResults = document.querySelector('.search-results');

            // Array com dados mockados dos eventos
            const eventos = [{
                    id: "1",
                    titulo: "Palestra: Inteligência Artificial na Educação",
                    data: "25 de Agosto, 2025 - 14:00",
                    local: "Auditório Central - Campus Principal",
                    organizador: "Prof. Dr. João Silva",
                    descricao: "Uma palestra envolvente sobre o impacto da IA na educação moderna e suas aplicações práticas no ensino superior.",
                    imagem: "🎤"
                },
                {
                    id: "2",
                    titulo: "Workshop: Programação em Python",
                    data: "28 de Agosto, 2025 - 09:00",
                    local: "Laboratório de Informática - Bloco B",
                    organizador: "Prof. Ana Santos",
                    descricao: "Workshop prático de programação em Python para iniciantes, com foco em aplicações científicas.",
                    imagem: "🔧"
                },
                // Adicione mais eventos conforme necessário
            ];

            // Sistema de busca
            searchTrigger.addEventListener('click', (e) => {
                e.preventDefault();
                searchContainer.style.display = 'flex';
                searchInput.focus();
            });

            searchClose.addEventListener('click', () => {
                searchContainer.style.display = 'none';
            });

            // Função para fechar o modal
            function closeModal() {
                document.getElementById('event-modal').style.display = 'none';
            }

            // Fechar com ESC
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    searchContainer.style.display = 'none';
                    closeModal();
                }
            });

            // Função para abrir o modal
            function openModal(eventId) {
                const evento = {
                    id: eventId,
                    titulo: "Workshop: Programação em Python",
                    data: "28 de Agosto, 2025 - 09:00",
                    local: "Laboratório de Informática - Bloco B",
                    localCompleto: "Bloco B, 2º andar, Sala 201 - Campus Principal",
                    organizador: "Prof. Ana Santos",
                    duracao: "2 horas",
                    vagas: "50 vagas disponíveis",
                    descricao: "Um workshop prático e intensivo focado em introduzir os conceitos fundamentais de programação usando Python. Ideal para iniciantes que desejam dar os primeiros passos no mundo da programação ou estudantes que querem aprofundar seus conhecimentos em uma das linguagens mais populares do mercado.",
                    imagem: "🐍",
                    topicos: [
                        "Introdução à sintaxe do Python",
                        "Estruturas de dados fundamentais",
                        "Funções e módulos básicos",
                        "Manipulação de arquivos",
                        "Introdução à programação orientada a objetos"
                    ]
                };

                const modal = document.getElementById('event-modal');

                // Atualiza o conteúdo do modal
                document.getElementById('modal-title').textContent = evento.titulo;
                const modalBody = document.querySelector('.event-details-full');

                // Atualiza o emoji/imagem
                document.querySelector('.event-emoji').textContent = evento.imagem;

                // Atualiza metadados
                document.querySelector('.event-metadata').innerHTML = `
                    <span><i>📅</i> ${evento.data}</span>
                    <span><i>📍</i> ${evento.local}</span>
                    <span><i>👤</i> ${evento.organizador}</span>
                `;

                // Atualiza descrição
                document.querySelector('.event-description p').textContent = evento.descricao;

                // Atualiza tópicos
                const topicsList = document.querySelector('.topics-list');
                topicsList.innerHTML = evento.topicos.map(topic => `<li>${topic}</li>`).join('');

                // Atualiza detalhes do card lateral
                document.querySelector('.vagas').textContent = evento.vagas;
                document.querySelector('.duracao').textContent = evento.duracao;
                document.querySelector('.local-completo').textContent = evento.localCompleto;

                modal.style.display = 'block';
            }

            // Adiciona evento de clique aos cards
            document.querySelectorAll('.event-card, .event-btn').forEach(element => {
                element.addEventListener('click', function(e) {
                    e.preventDefault();
                    const eventId = this.closest('.event-card').dataset.eventId;
                    openModal(eventId);
                });
            });

            // Fechamento do modal
            document.querySelector('.modal-close').addEventListener('click', closeModal);

            window.addEventListener('click', function(e) {
                const modal = document.getElementById('event-modal');
                if (e.target === modal) {
                    modal.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>