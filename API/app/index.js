  const express = require('express');
  const mysql = require('mysql');
  const bodyParser = require('body-parser');
  const cors = require('cors');
  const errorHandler  = require('./middleware/errlog');
  const userRouter = require('./router/private/userRouter');
  const bannerRouter = require('./router/public/banner');
  const productRouter = require('./router/public/product');
  const theloaiRouter = require('./router/public/theloai');
  const cartRouter = require('./router/private/cart');
  const paymentRouter = require('./router/private/payment');
  const notificationRouter = require('./router/private/notification');
  const onlinePaymentRouter = require('./router/private/onlinePayment');
  const app = express();
  app.use(bodyParser.json());
  app.use(bodyParser.urlencoded({ extended: true }));
  app.use(cors());
  // function authenticateToken(req, res, next) {
  //   const token = req.header('Authorization'); 
  //   if (!token) return res.json({ status:"fail", mess: 'Truy cập bị từ chối' });

  //   jwt.verify(token, secretKey, (err, user) => {
  //     if (err) return res.json({ status:"fail", mess: 'token không hợp lệ' });
  //     req.user = user;
  //     next();
  //   });
  // }
  app.use(errorHandler)
  app.use('/user', userRouter);
  app.use('/cart', cartRouter);
  app.use('/banner', bannerRouter);
  app.use('/product'  ,productRouter);
  app.use('/theloai', theloaiRouter);
  app.use('/payment', paymentRouter);
  app.use('/notification',notificationRouter)
  app.use('/online-payment',onlinePaymentRouter)
  app.listen(4000, () => {
    console.log('Server đang lắng nghe tại cổng 4000');
  });
