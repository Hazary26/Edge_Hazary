

def test_login_empty_credentials():
    driver = webdriver.Edge()
    try:
        driver.get("http://edgebook.wuaze.com/login.php")
        driver.find_element(By.ID, "username").clear()
        driver.find_element(By.ID, "password").clear()
        driver.find_element(By.ID, "loginButton").click()

        error_message = WebDriverWait(driver, 10).until(
            EC.presence_of_element_located((By.ID, "errorMsg"))
        ).text
        assert "Username and password cannot be empty." in error_message, "Validation error message not shown."
        print("Test Case 5 Passed: Login with empty credentials was denied as expected.")
    except Exception as e:
        print(f"Test Case 5 Failed: {e}")
    finally:
        driver.quit()
