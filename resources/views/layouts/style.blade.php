<style>
    form {
    max-width: 400px;
    margin: 60px auto;
    padding: 40px;
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
}

form h1 {
    text-align: center;
    margin: 0 0 28px;
    font-size: 28px;
    font-weight: 700;
    color: #111827;
}

form input[type="email"],
form input[type="password"] {
    width: 100%;
    padding: 12px 16px;
    margin-bottom: 16px;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    font-size: 15px;
    transition: border-color 0.2s, box-shadow 0.2s;
    box-sizing: border-box;
}

form input[type="email"]:focus,
form input[type="password"]:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
}

form input[type="checkbox"] {
    width: 16px;
    height: 16px;
    margin-right: 8px;
    accent-color: #3b82f6;
    cursor: pointer;
}

form label {
    color: #374151;
    font-size: 14px;
}

form button[type="submit"] {
    width: 100%;
    padding: 12px;
    margin-top: 12px;
    background: #3b82f6;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s, transform 0.1s;
}

form button[type="submit"]:hover {
    background: #2563eb;
}

form button[type="submit"]:active {
    transform: scale(0.98);
}
</style>