<style>
    body {
        min-height: 100vh;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background:
            radial-gradient(circle at 15% 20%, rgba(59, 130, 246, 0.25), transparent 30%),
            radial-gradient(circle at 85% 80%, rgba(168, 85, 247, 0.25), transparent 30%),
            linear-gradient(135deg, #0f172a 0%, #111827 50%, #020617 100%);
        font-family: Arial, sans-serif;
    }

    form {
        width: 100%;
        max-width: 420px;
        padding: 40px;
        box-sizing: border-box;
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 22px;
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.45);
    }

    form h1 {
        margin: 0 0 30px;
        text-align: center;
        color: #ffffff !important;
        font-size: 32px;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    form input[type="email"],
    form input[type="password"] {
        width: 100%;
        height: 50px;
        box-sizing: border-box;
        margin-bottom: 20px;
        padding: 0 16px;
        border: 1px solid rgba(255, 255, 255, 0.18);
        border-radius: 12px;
        outline: none;
        background: rgba(255, 255, 255, 0.1);
        color: #ffffff;
        font-size: 15px;
        transition: 0.3s ease;
    }

    form input[type="email"]::placeholder,
    form input[type="password"]::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    form input[type="email"]:focus,
    form input[type="password"]:focus {
        border-color: #60a5fa;
        background: rgba(255, 255, 255, 0.14);
        box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.15);
    }

    label {
        color: #dbeafe;
        font-size: 14px;
    }
    label input[type="checkbox"] {
        width: 16px;
        height: 16px;
        accent-color: #6366f1;
    }

    button {
        width: 100%;
        height: 50px;
        margin-top: 8px;
        border: none;
        border-radius: 12px;
        background: linear-gradient(135deg, #2563eb, #7c3aed);
        color: #ffffff;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.3s ease;
        box-shadow: 0 10px 25px rgba(79, 70, 229, 0.3);
    }

    button:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 30px rgba(79, 70, 229, 0.45);
    }

    button:active {
        transform: translateY(0);
    }

    .error {
        color: #fecaca;
        background: rgba(220, 38, 38, 0.15);
        border: 1px solid rgba(248, 113, 113, 0.3);
        border-radius: 8px;
        padding: 8px 10px;
        font-size: 13px;
        margin: -10px 0 15px;
    }

    @media (max-width: 500px) {
        form {
            margin: 20px;
            padding: 30px 22px;
        }

        form h1 {
            font-size: 28px;
        }
    }