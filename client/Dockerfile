FROM node:16-alpine

WORKDIR /var/www/vue

COPY package*.json ./

COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

RUN npm install

ADD . .

ENTRYPOINT ["/entrypoint.sh"]

CMD ["npm", "run", "dev"]