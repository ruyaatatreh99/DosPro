# DosPro
Dos HW#1 about microservices using Lumen framework
we used Lumen as our lightweight micro web framework for PHP by using it we were able to create two microservices, the first is the buyserver that allows the client to send an HTTP REST request to the server in order to buy a book base on its number and returns (bought book <BOOK_NAME>) in order to achieve that the server has to send a query to the catalog server to see if the book is in stock or not if not ,if there is it completes the buying  and decrements the number of items in stock, if not it returns (no book in store) , the other server is the catalog server which contains information about the book like name , price ,item_no etc. it enables the user to find info about the book based on its number or  topic. We used Postman or the browser as our client.
