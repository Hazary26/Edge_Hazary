

def test_pharmacist_empty_password():
    driver = webdriver.Edge()
    try:
        driver.get("http://edgebook.wuaze.com/login.php")
        driver.find_element(By.ID, "username").send_keys("Pharmacist01")
        driver.find_element(By.ID, "password").clear()
        driver.find_element(By.ID, "loginButton").click()

        error_message = WebDriverWait(driver, 10).until(
            EC.presence_of_element_located((By.ID, "errorMsg"))
        ).text
        assert "Password cannot be empty." in error_message, "Validation error message not shown."
        print("Test Case 3 Passed: Pharmacist login with empty password was denied as expected.")
    except Exception as e:
        print(f"Test Case 3 Failed: {e}")
    finally:
        driver.quit()

