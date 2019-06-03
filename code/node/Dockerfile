FROM node:10.13.0-jessie

# Create app directory
WORKDIR /usr/src/app

# copy both 'package.json' and 'package-lock.json' (if available)
COPY package*.json ./

# install dependencies
RUN npm install

CMD [ "npm", "start" ]

