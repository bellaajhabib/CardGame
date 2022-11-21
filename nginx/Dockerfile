FROM nginx:1.21.5

LABEL maintainer="bellaaj.habib@gmail.com"

RUN mkdir -p /etc/nginx/templates \
    mkdir -p /tmp/nginx

COPY nginx.conf /etc/nginx/
COPY templates/* /etc/nginx/templates/


ARG NGINX_SYMFONY_SERVER_NAME

CMD ["nginx"]

EXPOSE 80
EXPOSE 443
