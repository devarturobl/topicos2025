<style>
        :root {
            --primary: #5a0015; /* Vino oscuro principal */
            --primary-hover:rgb(100, 1, 24); /* Vino más oscuro para hover */
            --primary-light: #7b2c3f; /* Vino más claro para efectos */
            --text: #1e293b;
            --text-light: #64748b;
            --bg: #f8fafc;
            --container-bg: #ffffff;
            --input-bg: #f1f5f9;
            --wave-bg: linear-gradient(135deg, #5a0015, #7b2c3f);
            --shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .dark-mode {
            --primary: #7b2c3f;
            --primary-hover: rgb(100, 1, 24);
            --primary-light: #9d4b5f;
            --text: #f8fafc;
            --text-light: #94a3b8;
            --bg: #0f172a;
            --container-bg: #1e293b;
            --input-bg: #334155;
            --wave-bg: linear-gradient(135deg, #7b2c3f, #9d4b5f);
            --shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
            transition: background-color 0.3s, color 0.3s;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: var(--bg);
            color: var(--text);
            padding: 20px;
        }

        .container {
            position: relative;
            width: 1000px;
            height: 580px;
            display: flex;
            background: var(--container-bg);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .wave {
            position: absolute;
            width: 50%;
            height: 100%;
            background: var(--wave-bg);
            transition: all 0.8s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            z-index: 1;
        }

        .wave.login {
            left: 0;
            border-radius: 0 50% 50% 0;
        }

        .wave.register {
            left: 50%;
            border-radius: 50% 0 0 50%;
        }

        .form-container {
            width: 50%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            z-index: 2;
            transition: all 0.8s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }

        .form-container.login {
            left: 50%;
        }

        .form-container.register {
            left: 0;
        }

        .form-header {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 25px;
        }

        h2 {
            font-weight: 600;
            color: var(--text);
            font-size: 1.8rem;
        }

        

        .theme-toggle {
            background: none;
            border: none;
            color: var(--text-light);
            cursor: pointer;
            font-size: 1.2rem;
        }

        .theme-toggle:hover {
            color: var(--primary);
        }

        .input-group {
            position: relative;
            width: 100%;
            margin-bottom: 18px;
        }

        .input-group input {
            width: 100%;
            padding: 14px 15px 14px 45px;
            border: 2px solid transparent;
            background: var(--input-bg);
            border-radius: 8px;
            color: var(--text);
            font-size: 15px;
            outline: none;
            transition: border 0.3s;
        }

        .input-group input:focus {
            border-color: var(--primary);
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }

        .btn {
            width: 100%;
            padding: 14px;
            border: none;
            background: var(--primary);
            color: white;
            font-size: 16px;
            font-weight: 500;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .toggle-text {
            margin-top: 20px;
            font-size: 14px;
            cursor: pointer;
            color: var(--text-light);
            text-align: center;
        }

        .toggle-text span {
            color: var(--primary);
            font-weight: 500;
        }

        .toggle-text span:hover {
            text-decoration: underline;
        }

        .welcome-container {
            position: absolute;
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 3;
            transition: all 0.8s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            padding: 0 50px;
        }

        .welcome-container.login {
            left: 0;
        }

        .welcome-container.register {
            left: 50%;
        }

        .welcome-text {
            font-size: 28px;
            font-weight: 600;
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }

        .social-login {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }

        .social-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        .error-message {
            color: #ef4444;
            font-size: 13px;
            margin-top: 5px;
            display: none;
        }

        @media (max-width: 950px) {
            .container {
                width: 95%;
                height: auto;
                min-height: 600px;
                flex-direction: column;
            }

            .wave, .form-container, .welcome-container {
                width: 100%;
                position: relative;
                left: 0 !important;
                border-radius: 0 !important;
            }

            .wave {
                height: 180px;
                border-radius: 0 0 50% 50% !important;
            }

            .wave.register {
                order: -1;
                border-radius: 50% 50% 0 0 !important;
            }

            .form-container {
                padding: 35px;
            }

            .welcome-container {
                padding: 40px 20px;
            }

            .welcome-text {
                font-size: 24px;
                margin-bottom: 15px;
            }
        }

        @media (max-width: 576px) {
            .container {
                height: auto;
            }

            .form-container {
                padding: 25px;
            }

            h2 {
                font-size: 1.5rem;
            }

            .input-group input {
                padding: 12px 15px 12px 40px;
            }

            .social-login {
                gap: 10px;
            }

            .welcome-text {
                font-size: 20px;
            }
        }

        @media (max-width: 400px) {
            .form-container {
                padding: 20px;
            }

            .welcome-text {
                font-size: 18px;
            }
        }
    </style>