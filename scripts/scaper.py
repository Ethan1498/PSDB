from bs4 import BeautifulSoup
import requests

url = 'https://store.playstation.com/en-gb/home/games'
response = requests.get(url, timeout=5)
content = BeautifulSoup(response.content, "html.parser")

print (content)