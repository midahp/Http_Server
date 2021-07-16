# Horde PSR-15 Server Middleware/RequestHandler implementation

The horde\http_server is an implementation of PSR-15. Together with horde\http, it provides all the necessary building blocks needed for a standalone website, a slim API microframework or for fullstack horde applications. The http_server library has evolved out of efforts to modernize the horde/controller library and accompanying core components.

## Usage

See examples/ folder


## Design goals

### MVP

- horde/http_server aims at having few dependencies and subdependencies.
- Keep all the deeper Horde relations somewhere else
- Strict, simple implementation of a PSR-15 (middleware standard) ecosystem
- Through horde\http, adhere to PSR-7 (request/response standard), PSR-17 (request/response factories) and PSR-18 (HTTP client)
- allow opening the Horde ecosystem to external middleware vendors (avoid NIH)

### Stretch Goals

- Support a PSR-3 logger (once we have one in the ecosystem)
- Passing external compliance tests (which?)

### Non-Goals

- Backward compatibility with horde/controller (that library should offer a wrapper middleware instead)
- Advanced Routing (Integration should be done either in the router library or in a router middleware package)
- horde/core integration (That should be the job of horde/core or a separate package)
- httplug extensions