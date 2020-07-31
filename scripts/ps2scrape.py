from bs4 import BeautifulSoup
import requests
import csv
max_page = 7

outfile = open('ps2games.csv','w', newline='')
writer = csv.writer(outfile)
writer.writerow(["Name", "Image", "Price"])

for i in range (1,max_page):
  url = f'https://store.playstation.com/en-gb/grid/STORE-MSF75508-DISCOVERPS2ONPS3/{i}'
  page = requests.get(url)
  soup = BeautifulSoup(page.text, 'html.parser')

  paging = soup.findAll("div", {"class": "paginator-control__container"})
  for element in paging: 
    alllinks = soup.find_all("a", {"class": "paginator-control__page-number"})

  gameinfo = soup.findAll("div", {"class": "grid-cell"})
  for element in gameinfo:
      name = element.find("div",{"class":"grid-cell__title"}).text.strip()
      # image = element.find("img",{"product-image__img product-image__img--product product-image__img-main"})
      image = soup.select_one('.product-image__img-main')['src']
      print (image)
      price = element.find("h3",{"class":"price-display__price"})
      if price is not None:
        price = price.text.strip()
      else:
        price = ""
      writer.writerow([name, image, price]) 