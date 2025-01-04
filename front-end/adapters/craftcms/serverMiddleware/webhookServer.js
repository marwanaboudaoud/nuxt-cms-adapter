
import express from 'express';
import bodyParser from 'body-parser';
import { setCache, getCache } from './cacheService.js';

const app = express();
app.use(bodyParser.json());

app.post('/webhook', (req, res) => {
  const event = req.body;

  if (event.type === 'afterSave' && event.elementType === 'craft\\elements\\Entry') {
    const { slug } = event.entry;

    const cacheKey = `page-${slug}`;
    setCache(cacheKey, event.entry);

    res.status(200).send('Cache updated');
  } else {
    res.status(400).send('Unhandled event type');
  }
});

export default app;
