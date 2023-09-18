import { useTheme } from 'next-themes';
import classNames from 'classnames';
import styles from './index.module.scss';
import UnstyledLink from 'content/link/UnstyledLink';

export default function IconGroup() {
  const { setTheme, resolvedTheme } = useTheme();

  return (
    <div className={styles.iconGroup__wrap}>
      <button
        className="ml-4"
        onClick={() => setTheme(resolvedTheme === 'dark' ? 'light' : 'dark')}
      >
        <small>{resolvedTheme === 'dark' ? '辉' : '耀'}</small>
        <span
          className={classNames(
            'iconfont ml-2 !text-[22px]',
            resolvedTheme === 'dark' ? 'icon-moon' : 'icon-sun'
          )}
        />
      </button>
    </div>
  );
}
