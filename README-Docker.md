# GNPS Docker Setup

## Local Run (Docker Compose)

```bash
docker compose up --build
```

App URL: http://localhost:8080

## Local Run (Docker CLI)

```bash
docker build -t gnps .
docker run --rm -p 8080:10000 -e PORT=10000 gnps
```

## Deploy On Render

1. Push this repository to GitHub.
2. In Render, create a new **Web Service** from this repo.
3. Environment: **Docker**.
4. Render will detect `Dockerfile` and run the service.
5. No custom start command is needed.

The `docker-entrypoint.sh` script automatically maps Apache to Render's dynamic `PORT`.
