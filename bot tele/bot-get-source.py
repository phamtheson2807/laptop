from telegram.ext import Updater, MessageHandler, Filters, CallbackContext
from bs4 import BeautifulSoup
import requests
import tempfile

TOKEN = '6560140234:AAFmg1OpqgXJSQRuGkT8iAVXbOM4e_V-JE0'

def getsource(update, context):
    try:
        # Get URL from the message text
        url = update.message.text

        # Send a GET request to the website and get the HTML content
        response = requests.get(url)
        html_content = response.text

        # Create a BeautifulSoup object to parse HTML
        soup = BeautifulSoup(html_content, 'html.parser')

        # Fetch CSS files and include in the HTML source code
        for link in soup.find_all('link', {'rel': 'stylesheet'}):
            css_url = link.get('href')
            if css_url:
                css_response = requests.get(css_url)
                css_content = css_response.text
                style_tag = soup.new_tag('style')
                style_tag.string = css_content
                link.replace_with(style_tag)

        # Fetch JavaScript files and include in the HTML source code
        for script in soup.find_all('script', {'src': True}):
            js_url = script.get('src')
            if js_url:
                js_response = requests.get(js_url)
                js_content = js_response.text
                script_tag = soup.new_tag('script')
                script_tag.string = js_content
                script.replace_with(script_tag)

        # Get HTML source code with lang attribute
        source_code = f'<!DOCTYPE html><html lang="en">{soup.prettify()}</html>'

        # Save source code to a temporary file
        with tempfile.NamedTemporaryFile(suffix=".html", delete=False) as temp:
            temp.write(source_code.encode())
            temp_file_name = temp.name

        # Send the source code file
        with open(temp_file_name, 'rb') as temp_file:
            update.message.reply_document(temp_file)

    except Exception as e:
        print(f"An error occurred: {e}")
        update.message.reply_text("Sorry, an error occurred while processing your request.")

def main():
    updater = Updater(TOKEN)

    dispatcher = updater.dispatcher

    # Use MessageHandler with a filter to check for URLs
    dispatcher.add_handler(MessageHandler(Filters.regex(r'https?://\S+'), getsource))

    updater.start_polling()

    updater.idle()

if __name__ == '__main__':
    main()
