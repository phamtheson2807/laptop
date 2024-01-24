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

        # Get HTML source code
        source_code = str(soup)

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
