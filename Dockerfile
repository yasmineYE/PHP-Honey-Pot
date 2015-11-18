FROM tutum/lamp:latest

RUN rm -rvf /app/
WORKDIR /app/
ADD . /app/

EXPOSE 80
CMD ["/run.sh"]
