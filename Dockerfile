FROM tutum/lamp:latest

RUN rm -rvf /app/
WORKDIR /app/
ADD . /app/
ADD ./apache2.conf /etc/apache2/apache2.conf

EXPOSE 80
CMD ["/run.sh"]
