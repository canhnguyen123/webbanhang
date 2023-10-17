const express = require('express');
const mysql = require('mysql');
const bodyParser = require('body-parser');
const cors = require('cors');
const unidecode = require('unidecode');
const userRouter = require('./router/private/userRouter');
const bannerRouter = require('./router/public/banner');
const productRouter = require('./router/public/product');
const theloaiRouter = require('./router/public/theloai');
const app = express();
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(cors());

app.use('/user', userRouter);
app.use('/banner', bannerRouter);
app.use('/product', productRouter);
app.use('/theloai', theloaiRouter);
app.listen(4000, () => {
  console.log('Server đang lắng nghe tại cổng 4000');
});
