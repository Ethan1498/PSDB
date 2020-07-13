from bs4 import BeautifulSoup
import requests
import csv

url = 'https://store.playstation.com/en-gb/grid/STORE-MSF75508-FULLGAMES/1'
page = requests.get(url)
soup = BeautifulSoup(page.text, 'html.parser')

paging = soup.findAll("div", {"class": "paginator-control__container"})
for element in paging: 
  alllinks = soup.find_all("a", {"class": "paginator-control__next"})

print(alllinks)

# start_page = paging[1].text
# last_page = paging[len(paging)-2].text

outfile = open('psgames.csv','w', newline='')
writer = csv.writer(outfile)
writer.writerow(["Name", "Price"])

gameinfo = soup.findAll("div", {"class": "grid-cell__body"})
for element in gameinfo:
    name = element.find("div",{"class":"grid-cell__title"}).text.strip()
    price = element.find("h3",{"class":"price-display__price"}).text.strip()
    writer.writerow([name, price])