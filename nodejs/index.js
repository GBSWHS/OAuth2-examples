const OAUTH2_CLIENT_ID = ''
const OAUTH2_CLIENT_SECRET = ''
const OAUTH2_REDIRECT_URI = ''

const express = require('express')
const fetch = require('node-fetch')
const exphbs = require("express-handlebars")

const app = express()

app.engine('handlebars', exphbs())
app.set('view engine', 'handlebars')

app.get('/', (_, res) => res.render('index', { OAUTH2_CLIENT_ID, OAUTH2_REDIRECT_URI }))
app.get('/callback', async (req, res) => {
  const data = await fetch('https://auth.gbsw.hs.kr/api/ident', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      client_id: OAUTH2_CLIENT_ID,
      client_secret: OAUTH2_CLIENT_SECRET,
      redirect_uri: OAUTH2_REDIRECT_URI,
      grant_type: 'authorization_code',
      code: req.query.code,
    })
  }).then((res) => res.json())

  res.render('callback', { data: JSON.stringify(data,null, 2) })
})

app.listen(8080, () => console.log('Server at http://localhost:8080'))

if (!OAUTH2_CLIENT_ID || !OAUTH2_CLIENT_SECRET || !OAUTH2_REDIRECT_URI) {
  console.log('OAUTH2_CLIENT_ID 설정이 진행되지 않았습니다. index.js에서 설정하십시오.')
  process.exit(-1)
}
