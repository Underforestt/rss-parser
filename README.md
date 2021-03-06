# RSS-Parser
## Installation

Clone the repository
```bash
git clone https://github.com/Underforestt/rss-parser.git
```

Create .env file
```bash
touch .env
cp .env.example .env
```

Build docker containers
```bash
make build
```

Raise containers
```bash
make up
```

## API docs
Now you can check api documentation on this URL
```http request
    http://localhost:8000/api/documentation
```

## Other makefile commands

Start scheduled worker to parse lifehacker.com
```bash
make schedule
```

Manually parse lifehacker.com
```bash
make parse
```

Stop Docker containers
```bash
make down
```
