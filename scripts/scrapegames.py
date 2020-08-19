from bs4 import BeautifulSoup
import requests
import MySQLdb

HOST = "localhost"
USERNAME = "root"
PASSWORD = "root"
DATABASE = "game"

max_page = 2
consoles = [("ps1", "https://store.playstation.com/en-gb/grid/STORE-MSF75508-RETROPS1/{}"),
("ps2", "https://store.playstation.com/en-gb/grid/STORE-MSF75508-DISCOVERPS2ONPS3/{}"),
("ps3", "https://store.playstation.com/en-gb/grid/STORE-MSF75508-PLATFORMPS3/{}"),
("ps4", "https://store.playstation.com/en-gb/grid/STORE-MSF75508-PS4CAT/{}")]

db = MySQLdb.connect(HOST, USERNAME, PASSWORD, DATABASE)
cursor = db.cursor()
for console in consoles:
    console_name = console[0]
    page_url = console[1]
    

    for i in range (1,max_page):
        url = page_url.format(i)
        page = requests.get(url)
        soup = BeautifulSoup(page.text, 'html.parser')

        paging = soup.findAll("div", {"class": "paginator-control__container"})
        for element in paging: 
            alllinks = soup.find_all("a", {"class": "paginator-control__page-number"})

        gameinfo = soup.findAll("div", {"class": "grid-cell"})
        for element in gameinfo:
            name = str(element.find("div",{"class":"grid-cell__title"}).text.strip())
            image = element.find("img",{"class":"product-image__img-main"})['src']
            price = element.find("h3",{"class":"price-display__price"})
            if price is not None:
                price = price.text.strip()[1:]                 
            else:
                price = ""
            
            sql = f"INSERT INTO {console_name}games(title, price, image, console) VALUES('{name}', {price}, '{image}', {console_name})"
            try:
                cursor.execute(sql)
                db.commit()   
            except:                
                db.rollback()
            sql = f"UPDATE {console_name}games SET price = {price} WHERE title = '{name}'"
            try:
                cursor.execute(sql)
                db.commit()   
            except:                
                db.rollback()
            sql = "SELECT LAST_INSERT_ID()"
            try:
                cursor.execute(sql)
                result = cursor.fetchone()
            except:
                db.rollback()
                db.close()
            
              