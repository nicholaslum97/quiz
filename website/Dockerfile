FROM python:latest


ENV PYTHONDONTWRITEBYTECODE 1
ENV PYTHONUNBUFFERED 1

RUN pip install --upgrade pip

COPY ./app /app

WORKDIR /app

COPY ./requirements.txt .
RUN pip install -r requirements.txt