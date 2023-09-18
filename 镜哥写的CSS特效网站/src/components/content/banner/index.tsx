import { useTheme } from 'next-themes';
import styles from '../index.module.scss';
export default function Banner() {
  const { resolvedTheme } = useTheme();

  return (
    <div className={styles.star__background}>
      <div className={styles.container}>
        {resolvedTheme === 'light' ? (
          <div className={styles.area}>
            <ul className={styles.circles}>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
            </ul>
          </div>
        ) : (
          <div className={styles.background}>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
          </div>
        )}
        <div className={styles.title}>
          发现<span className="text-[#ff5858]">青知木杂货铺</span>的魅力
        </div>
      </div>
    </div>
  );
}
