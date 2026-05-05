import re
import urllib.request as request
import urllib.parse as parse

url = 'http://localhost:8001/login'
with request.urlopen(url) as r:
    html = r.read().decode('utf-8')
    cookie = r.getheader('Set-Cookie')
    match = re.search(r'name="_token" value="([^"]+)"', html)
    token = match.group(1) if match else None
    print('status', r.status)
    print('cookie', cookie.split(';')[0] if cookie else 'none')
    print('token', token[:20] if token else 'none')

if not token:
    raise SystemExit('csrf token not found')

headers = {
    'Cookie': cookie.split(';')[0],
    'Content-Type': 'application/x-www-form-urlencoded',
}
data = parse.urlencode({
    '_token': token,
    'email': 'test@example.com',
    'password': 'secret',
    'remember': 'on',
}).encode('utf-8')
req = request.Request(url, data=data, headers=headers)
try:
    with request.urlopen(req) as r2:
        print('post status', r2.status)
        print('post url', r2.geturl())
        print('body', r2.read(400).decode('utf-8'))
except request.HTTPError as e:
    print('error', e.code)
    print(e.read(800).decode('utf-8'))
