FROM node:alpine

RUN apk add --no-cache tini git \
    && yarn global add git-http-server \
    && adduser -D -g NicholasLumYeHan 2001605@sit.singaporetech.edu.sg

USER git
WORKDIR /home/git

RUN git init --bare repository.git

ENTRYPOINT ["tini", "--", "git-http-server", "-p", "3000", "/home/git"]