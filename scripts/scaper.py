from bs4 import BeautifulSoup
import requests
import csv
max_page = 3

outfile = open('psgames.csv','w', newline='')
writer = csv.writer(outfile)
writer.writerow(["Name", "Price"])

for i in range (1,max_page):
  url = f'https://store.playstation.com/en-gb/grid/STORE-MSF75508-FULLGAMES/{i}'
  page = requests.get(url)
  soup = BeautifulSoup(page.text, 'html.parser')

  paging = soup.findAll("div", {"class": "paginator-control__container"})
  for element in paging: 
    alllinks = soup.find_all("a", {"class": "paginator-control__page-number"})

  gameinfo = soup.findAll("div", {"class": "grid-cell__body"})
  for element in gameinfo:
      name = element.find("div",{"class":"grid-cell__title"}).text.strip()
      price = element.find("h3",{"class":"price-display__price"})
      if price is not None:
        price = price.text.strip()
        print(price)
      else:
        price = ""
        print(price)
      writer.writerow([name, price]) 