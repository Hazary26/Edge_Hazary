

def test_cashier_invalid_username():
    driver = webdriver.Edge()
    try:
        driver.get("http://edgebook.wuaze.com/login.php")
        driver.find_element(By.ID, "username").send_keys("InvalidCashier")
        driver.find_element(By.ID, "password").send_keys("CashierPass123")
        driver.find_element(By.ID, "loginButton").click()

        error_message = WebDriverWait(driver, 10).until(
            EC.presence_of_element_located((By.ID, "errorMsg"))
        ).text
        assert "Invalid username or password." in error_message, "Validation error message not shown."
        print("Test Case 4 Passed: Cashier login with invalid username was denied as expected.")
    except Exception as e:
        print(f"Test Case 4 Failed: {e}")
    finally:
        driver.quit()


