
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

def test_admin_login():
    driver = webdriver.Edge()
    try:
        driver.get("http://edgebook.wuaze.com/login.php")
        driver.find_element(By.ID, "username").send_keys("Admin123")
        driver.find_element(By.ID, "password").send_keys("AdminPass@123")
        driver.find_element(By.ID, "loginButton").click()
        
        WebDriverWait(driver, 10).until(EC.url_to_be("http://edgebook.wuaze.com/admin_dashboard.php"))
        print("Test Case 1 Passed: Admin logged in successfully.")
    except Exception as e:
        print(f"Test Case 1 Failed: {e}")
    finally:
        driver.quit()

