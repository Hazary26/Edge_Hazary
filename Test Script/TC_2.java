

def test_manager_invalid_password():
    driver = webdriver.Edge()
    try:
        driver.get("http://edgebook.wuaze.com/login.php")
        driver.find_element(By.ID, "username").send_keys("Manager01")
        driver.find_element(By.ID, "password").send_keys("WrongPass123")
        driver.find_element(By.ID, "loginButton").click()

        error_message = WebDriverWait(driver, 10).until(
            EC.presence_of_element_located((By.ID, "errorMsg"))
        ).text
        assert "Invalid username or password." in error_message, "Validation error message not shown."
        print("Test Case 2 Passed: Manager login with invalid password was denied as expected.")
    except Exception as e:
        print(f"Test Case 2 Failed: {e}")
    finally:
        driver.quit()


