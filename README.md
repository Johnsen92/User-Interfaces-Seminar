# UI-Seminar Docker environment

## Software installation (Ubuntu 16.04 centric)

- `docker-compose` is useful, install it from [here](https://docs.docker.com/compose/install/)
- `docker` itself is useful, install it from [here](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-16-04)
- `node` update / install it like [this](https://www.hostingadvice.com/how-to/update-node-js-latest-version/)
- `vuetify` can be added like [this](https://vuetifyjs.com/en/getting-started/quick-start)

## Useful commands for docker
Compose the container from scratch with:
`docker-compose up`

Get a list of active containers:
`docker container ls`

Get a bash inside the container (either container id or name):
`docker exec -i -t ui_seminar_web_1 /bin/bash`

Get information on container (e.g IP):
`docker inspect containerID`

Recreate the database volumes by removing the old container and its datadir:
`docker-compose rm mysql && rm -rf datadir`

Force docker to recreate images after a change to `docker-compose.yaml`:
`docker-compose up --force-recreate`