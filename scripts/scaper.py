from bs4 import BeautifulSoup
import requests

url = 'https://store.playstation.com/en-gb/home/games'
page = requests.get(url)
response = requests.get(url, timeout=5)
content = BeautifulSoup(response.content, "html.parser")
soup = BeautifulSoup(page.content, 'html.parser')

results = soup.find(id='ember1151')

print (results)
